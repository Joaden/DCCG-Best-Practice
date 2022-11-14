<?php

namespace App\Service\Cart;

use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {


    protected $session;
    protected $productRepository;

    public function __construct(SessionInterface $session, ProductsRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }
    public function add(int $id)
    {
            //j'enregistre le panier  de la session en tant que tableau vide
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$id]))
        {
            $panier[$id]++;

        }else{
            //je modifie la quantitée du panier  de la session
            $panier[$id] = 1;
        }

        //je remplace le panier par mon $panier
        $this->session->set('panier', $panier);

        // Affiche le contenu du panier en dump&die !
//        dd($session->get('panier'));
    }

    public function add_list(int $id)
    {
        // j'enregistre les produit non disponible pour plutard !
        $checklist = $this->session->get('checklist', []);
        if(!empty($checklist[$id]))
        {
            $checklist[$id]++;

        }else{
            //je modifie la quantitée de la checklist de la session
            $checklist[$id] = 1;
        }
        // je remplace le contenu
        $this->session->set('checklist', $checklist);

    }

    public function listToCart(int $id)
    {
        var_dump($id);
        die;
    }
    
    public function removeList(int $id)
    {
        $checklist = $this->session->get('checklist', []);

        if(!empty($checklist[$id]))
        {
            unset($checklist[$id]);
        }
        $this->session->set('checklist', $checklist);
    }

    public function remove(int $id)
    {
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$id]))
        {
            unset($panier[$id]);
        }
        $this->session->set('panier', $panier);
    }

    public function removeAll(int $id)
        {
            $panier = $this->session->get('panier', []);

            foreach($panier as $id) {
                if(!empty($panier[$id]))
                {
                    unset($panier[$id]);
                }
            }
            dd($panier);
            var_dump($panier);
            $this->session->set('panier', $panier);
        }

    public function getFullCart() : array
    {
            //
        $panier = $this->session->get('panier', []);

        // tableau vide
        $panierWithData = [];

        //foreach pour recupérer les datas
        foreach($panier as $id => $quantity) {
            $panierWithData[] = [
                'product' => $this->productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        return $panierWithData;

    }
//
    public function getTotal() : float
    {
        $total = 0;

//        $panierWithData = $this->getFullCart();

        /// le total de litem est = a item product ( prix) * la quantitée
        foreach($this->getFullCart() as $item)
        {
            if($item['product'] == !null)
            {
                $total += $item['product']->getPrice() * $item['quantity'];
            }
        }

        return $total;

    }

    public function getTotalQuantity() : float
    {
        $totalQ = 0;

//        $panierWithData = $this->getFullCart();

        /// le total de litem est = a item quantity * la quantitée
        foreach($this->getFullCart() as $item)
        {
            if($item['quantity'] == !null)
            {
                $totalQ += $item['quantity'] * $item['quantity'];
            }
        }

        return $totalQ;

    }

    public function getTotalList() : float
    {
        $totalQ = 0;
        $totalTva = 0;
        $tva = 20/100;
        var_dump($tva);
        die;
        
        
        return $totalTva;
    }
//

}