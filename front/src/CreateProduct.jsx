import React, { useState, useEffect } from "react";
import axios from "axios";

const CreateProduct = () => {
  const [formData, setFormData] = useState({
    nom: "",
    description: "",
    prix: "",
    categorieId: "",
  });
  const [categories, setCategories] = useState([]);
  const [errors, setErrors] = useState({});
  const [successMessage, setSuccessMessage] = useState("");

  useEffect(() => {
    axios
      .get("https://localhost:8000/categories")
      .then((response) => {
        setCategories(response.data);
      })
      .catch((error) => {
        console.error("Error fetching categories:", error);
      });
  }, []);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const validate = () => {
    const newErrors = {};
    if (!formData.nom) newErrors.nom = "Le nom est obligatoire.";
    if (!formData.description) newErrors.description = "La description est obligatoire.";
    if (!formData.prix) newErrors.prix = "Le prix est obligatoire.";
    else if (isNaN(formData.prix) || Number(formData.prix) <= 0)
      newErrors.prix = "Le prix doit être un nombre positif.";
    if (!formData.categorieId) newErrors.categorieId = "La catégorie est obligatoire.";

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    setSuccessMessage("");
    setErrors({});

    if (!validate()) return;

    axios
      .post("https://localhost:8000/produits", {
        nom: formData.nom,
        description: formData.description,
        prix: parseFloat(formData.prix),
        categorie: {id: formData.categorieId},
      }, {
        headers: {
          "Content-Type": "application/json"
        }
      })
      .then(() => {
        setSuccessMessage("Produit créé avec succès !");
        setFormData({ nom: "", description: "", prix: "", categorieId: "" });
      })
      .catch((error) => {
        console.error("Error creating product:", error);
        setErrors({ api: "Une erreur est survenue lors de la création du produit." });
      });
    };

  return (
    <div style={{ maxWidth: "600px", margin: "0 auto", padding: "20px" }}>
      <h2>Créer un Produit</h2>
      {successMessage && <p style={{ color: "green" }}>{successMessage}</p>}
      {errors.api && <p style={{ color: "red" }}>{errors.api}</p>}
      <form onSubmit={handleSubmit}>
        <div style={{ marginBottom: "15px" }}>
          <label>
            Nom:
            <input
              type="text"
              name="nom"
              value={formData.nom}
              onChange={handleChange}
              style={{ width: "100%", padding: "8px", marginTop: "5px" }}
            />
          </label>
          {errors.nom && <p style={{ color: "red" }}>{errors.nom}</p>}
        </div>
        <div style={{ marginBottom: "15px" }}>
          <label>
            Description:
            <textarea
              name="description"
              value={formData.description}
              onChange={handleChange}
              style={{ width: "100%", padding: "8px", marginTop: "5px" }}
            />
          </label>
          {errors.description && <p style={{ color: "red" }}>{errors.description}</p>}
        </div>
        <div style={{ marginBottom: "15px" }}>
          <label>
            Prix:
            <input
              type="number"
              name="prix"
              value={formData.prix}
              onChange={handleChange}
              style={{ width: "100%", padding: "8px", marginTop: "5px" }}
            />
          </label>
          {errors.prix && <p style={{ color: "red" }}>{errors.prix}</p>}
        </div>
        <div style={{ marginBottom: "15px" }}>
          <label>
            Catégorie:
            <select
              name="categorieId"
              value={formData.categorieId}
              onChange={handleChange}
              style={{ width: "100%", padding: "8px", marginTop: "5px" }}
            >
              <option value="">Sélectionnez une catégorie</option>      
              {categories.map((categorie) => (
                <option key={categorie.id} value={categorie.id}>
                  {categorie.nom}
                </option>
              ))}
            </select>
          </label>
          {errors.categorieId && <p style={{ color: "red" }}>{errors.categorieId}</p>}
        </div>
        <button type="submit" style={{ padding: "10px 20px", backgroundColor: "blue", color: "white" }}>
          Créer
        </button>
      </form>
    </div>
  );
};

export default CreateProduct;