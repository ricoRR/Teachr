<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private ProduitRepository $produitRepository;

    public function __construct(EntityManagerInterface $entityManager, ProduitRepository $produitRepository)
    {
        $this->entityManager = $entityManager;
        $this->produitRepository = $produitRepository;
    }

    #[Route('/produits', name: 'all_produit', methods: ['GET'])]
    public function show_all()
    {
        $produits = $this->produitRepository->findAll();
        return $this->json($produits, context: ['groups' => 'produit:read']);
    }

    #[Route('/produits', name: 'create_produit', methods: ['POST'])]
    public function create(Request $request, SerializerInterface $serializer)
    {

        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        $produit = $serializer->deserialize($request->getContent(), Produit::class, 'json');

        if (isset($data['categorie']['id'])) {
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($data['categorie']['id']);
            if (!$categorie) {
                return $this->json(['error' => 'Category not found'], 404);
            }
            $produit->setCategorie($categorie);
        }

        $this->entityManager->persist($produit);
        $this->entityManager->flush();

        return $this->json(['message' => 'Product created', 'id' => $produit->getId()], 201);
    }

    #[Route('/produits/{id}', name: 'get_produit', methods: ['GET'])]
    public function show($id)
    {
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            return $this->json(['error' => 'Product not found'], 404);
        }

        return $this->json($produit, context: ['groups' => 'produit:read']);
    }

    #[Route('/produits/{id}', name: 'update_produit', methods: ['PUT'])]
    public function update($id, Request $request)
    {
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            return $this->json(['error' => 'Product not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $produit->setNom($data['nom']);
        $produit->setDescription($data['description']);
        $produit->setPrix($data['prix']);

        $this->entityManager->flush();

        return $this->json(['message' => 'Product updated'], 200);
    }

    #[Route('/produits/{id}', name: 'delete_produit', methods: ['DELETE'])]
    public function delete($id)
    {
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            return $this->json(['error' => 'Product not found'], 404);
        }

        $this->entityManager->remove($produit);
        $this->entityManager->flush();

        return $this->json(['message' => 'Product deleted'], 200);
    }
}
