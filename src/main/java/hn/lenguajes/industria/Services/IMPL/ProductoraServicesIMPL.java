/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Services.IMPL;

import hn.lenguajes.industria.Entity.Productora;
import hn.lenguajes.industria.Repository.ProductoraRepository;
import hn.lenguajes.industria.Services.productoraService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Iker
 */
@Service
public class ProductoraServicesIMPL implements productoraService{
    
    @Autowired
    private ProductoraRepository ProdRep;

    @Override
    public List<Productora> getProd() {
        return this.ProdRep.findAll();
    }

    @Override
    public Productora saveProd(Productora prod) {
        prod.setNombre(prod.getNombre());
        return this.ProdRep.save(prod);
    }

    @Override
    public void deleteProd(int cod) {
        this.ProdRep.deleteById(cod);
    }

    @Override
    public Productora findProd(int cod) {
        return this.ProdRep.findById(cod).get();
    }

    @Override
    public Productora editProd(Productora productora) {
        productora.setNombre(productora.getNombre());
        return this.ProdRep.save(productora);
    }

}
