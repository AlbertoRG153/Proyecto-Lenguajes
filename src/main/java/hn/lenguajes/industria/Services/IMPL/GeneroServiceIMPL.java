/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Services.IMPL;

import hn.lenguajes.industria.Entity.Genero;
import hn.lenguajes.industria.Repository.GeneroRepository;
import hn.lenguajes.industria.Services.GeneroService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Iker
 */
@Service
public class GeneroServiceIMPL implements GeneroService{
    
    @Autowired
    private GeneroRepository rep;
    
    @Override
    public List<Genero> getGend() {
        return this.rep.findAll();
    }

    @Override
    public Genero saveGend(Genero gender) {
        gender.setDescripcion(gender.getDescripcion());
        return this.rep.save(gender);
    }

    @Override
    public void deleteGend(int cod) {
        this.rep.deleteById(cod);
    }

    @Override
    public Genero findGend(int cod) {
        return this.rep.findById(cod).get();
    }

    @Override
    public Genero editGend(Genero gender) {
        gender.setDescripcion(gender.getDescripcion());
        return this.rep.save(gender);
    }
    
}
