<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

class CategorieController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private CategorieRepository $categorieRepository;

    public function __construct(EntityManagerInterface $entityManager, CategorieRepository $categorieRepository)
    {
        $this->entityManager = $entityManager;
        $this->categorieRepository = $categorieRepository;
    }

    #[Route('/categories', name: 'all_categories', methods: ['GET'])]
    public function show_all()
    {
        $categories = $this->categorieRepository->findAll();
        return $this->json($categories, context: ['groups' => 'categorie:read']);
    }

    #[Route('/categories', name: 'create_category', methods: ['POST'])]
    public function create(Request $request, SerializerInterface $serializer)
    {
        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return $this->json(['error' => 'Name is NULL'], 400);
        }

        $categorie = $serializer->deserialize(json_encode($data), Categorie::class, 'json');
        $this->entityManager->persist($categorie);
        $this->entityManager->flush();

        return $this->json(['message' => 'Category created', 'id' => $categorie->getId()], 201);
    }

    #[Route('/categories/{id}', name: 'get_category', methods: ['GET'])]
    public function show($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (!$categorie) {
            return $this->json(['error' => 'Category not found'], 404);
        }

        return $this->json($categorie, context: ['groups' => 'categorie:read']);
    }

    #[Route('/categories/{id}', name: 'update_category', methods: ['PUT'])]
    public function update($id, Request $request)
    {
        $categorie = $this->categorieRepository->find($id);

        if (!$categorie) {
            return $this->json(['error' => 'Category not found'], 404);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['nom'])) {
            $categorie->setNom($data['nom']);
        }

        $this->entityManager->flush();

        return $this->json(['message' => 'Category updated'], 200);
    }

    #[Route('/categories/{id}', name: 'delete_category', methods: ['DELETE'])]
    public function delete($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (!$categorie) {
            return $this->json(['error' => 'Category not found'], 404);
        }

        $this->entityManager->remove($categorie);
        $this->entityManager->flush();

        return $this->json(
            ['message' => 'Category deleted'],
            200
        );
    }
}
