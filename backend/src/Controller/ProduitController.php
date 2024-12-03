<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProduitController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private ProduitRepository $produitRepository;

    public function __construct(EntityManagerInterface $entityManager, ProduitRepository $produitRepository)
    {
        $this->entityManager = $entityManager;
        $this->produitRepository = $produitRepository;
    }

    #[Route('/produits', name: 'all_produit', methods:['GET'])]
    public function show_all()
    {
        $produit = $this->produitRepository->findAll();
        return $this->json($produit);
    }

    #[Route('/produits', name: 'create_produit', methods: ['POST'])]
    public function create(Request $request, SerializerInterface $serializer)
    {
        $data = json_decode($request->getContent(), true);
        $produit = $serializer->deserialize(json_encode($data), Produit::class, 'json');

        $this->entityManager->persist($produit);
        $this->entityManager->flush();

        return new JsonResponse(['message' => 'Product created', 'id' => $produit->getId()], 201);
    }

    #[Route('/produits/{id}', name: 'get_produit', methods: ['GET'])]
    public function show($id)
    {
        $produit = $this->produitRepository->find($id);
        if (!$produit) {
            return new JsonResponse(['error' => 'Product not found'], 404);
        }

        return $this->json($produit);
    }

    #[Route('/produits/{id}', name: 'update_produit', methods: ['PUT'])]
    public function update($id, Request $request)
    {
        $produit = $this->produitRepository->find($id);
        if (!$produit) {
            return new JsonResponse(['error' => 'Product not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $produit->setNom($data['nom']);
        $produit->setDescription($data['description']);
        $produit->setPrix($data['prix']);

        $this->entityManager->flush();

        return new JsonResponse(['message' => 'Product updated']);
    }

    #[Route('/produits/{id}', name: 'delete_produit', methods: ['DELETE'])]
    public function delete($id)
    {
        $produit = $this->produitRepository->find($id);
        if (!$produit) {
            return new JsonResponse(['error' => 'Product not found'], 404);
        }

        $this->entityManager->remove($produit);
        $this->entityManager->flush();

        return new JsonResponse(['message' => 'Product deleted']);
    }
}
