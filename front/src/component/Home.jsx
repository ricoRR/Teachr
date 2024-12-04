import React, { useState, useEffect } from "react";
import { Link } from "react-router";
import axios from "axios";

const Home = () => {
  const [produits, setProduits] = useState([]);
  const [editingProduit, setEditingProduit] = useState(null);

  useEffect(() => {
    fetchProduits();
  }, []);

  const fetchProduits = () => {
    axios
      .get("https://localhost:8000/produits")
      .then((response) => setProduits(response.data))
      .catch((error) => console.error("Error fetching products:", error));
  };

  const saveChanges = () => {
    axios
      .put(`https://localhost:8000/produits/${editingProduit.id}`, editingProduit)
      .then(fetchProduits)
      .finally(() => setEditingProduit(null));
  };

  const remove = (id) => {
    axios
      .delete(`https://localhost:8000/produits/${id}`)
      .then(fetchProduits)
  }

  return (
    <div>
      <nav>
        <Link to="/create">Ajouter un produit</Link>
      </nav>
      <table border="1">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {produits.map((produit) => (
            <tr key={produit.id}>
              {editingProduit?.id === produit.id ? (
                <>
                  <td>
                    <input
                      value={editingProduit.nom}
                      onChange={(e) =>
                        setEditingProduit({ ...editingProduit, nom: e.target.value })
                      }
                    />
                  </td>
                  <td>
                    <input
                      value={editingProduit.description}
                      onChange={(e) =>
                        setEditingProduit({
                          ...editingProduit,
                          description: e.target.value,
                        })
                      }
                    />
                  </td>
                  <td>
                    <input
                      type="number"
                      value={editingProduit.prix}
                      onChange={(e) =>
                        setEditingProduit({
                          ...editingProduit,
                          prix: parseFloat(e.target.value),
                        })
                      }
                    />
                  </td>
                  <td>{produit.categorie.nom}</td>
                  <td>
                    <button onClick={saveChanges}>Save</button>
                    <button onClick={() => setEditingProduit(null)}>Cancel</button>
                  </td>
                </>
              ) : (
                <>
                  <td>{produit.nom}</td>
                  <td>{produit.description}</td>
                  <td>{produit.prix}</td>
                  <td>{produit.categorie.nom}</td>
                  <td>
                    <button onClick={() => setEditingProduit(produit)}>Edit</button>
                  </td>
                  <td>
                    <button onClick={() => remove(produit.id)}>X</button>
                  </td>
                </>
              )}
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default Home;