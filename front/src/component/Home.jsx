import React, { useState, useEffect } from "react";
import { Link } from "react-router";
import axios from "axios";


const Home = () => {

    const [produits, setProduits] = useState([]);
    
    useEffect(() => {
        axios
        .get("https://localhost:8000/produits")
        .then((response) => {
            setProduits(response.data);
        })
        .catch((error) => {
            console.error("Error fetching Products:", error);
        });
    }, []);
   
    const mapedItems = produits.map(produit =><tr><th>{produit.nom}</th><th>{produit.description}</th><th>{produit.prix}</th><th>{produit.categorie.nom}</th></tr>)

    return(
        <div>
            <nav><Link to='/create'>Ajouter un produit</Link></nav>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                </tr>
                {mapedItems}
            </table>
        </div>
    )
}

export default Home;