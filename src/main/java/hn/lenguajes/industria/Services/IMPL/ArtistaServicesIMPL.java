/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Services.IMPL;

import hn.lenguajes.industria.Entity.Artista;
import hn.lenguajes.industria.Entity.Productora;
import hn.lenguajes.industria.Repository.ArtistaRepository;
import hn.lenguajes.industria.Repository.ProductoraRepository;
import hn.lenguajes.industria.Services.ArtistaService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Iker
 */
@Service
public class ArtistaServicesIMPL implements ArtistaService{
    
    @Autowired
    private ArtistaRepository rep;
    
    @Autowired
    private ProductoraRepository repP;
    
    @Override
    public List<Artista> getArt() {
        return this.rep.findAll();
    }

    @Override
    public Artista saveArt(Artista artist) {
        return this.rep.save(artist);
    }

    @Override
    public void deleteArt(int cod) {
        this.rep.deleteById(cod);
    }

    @Override
    public Artista findArt(int cod) {
        return this.rep.findById(cod).get();
    }

    @Override
    public Artista assignProducertoArtist(int art, int prod) {
        Artista artist = this.rep.findById(art).get();
        Productora producer = this.repP.findById(prod).get();
        artist.setProductora(producer);
        return this.rep.save(artist);
    }

    @Override
    public Artista editArt(Artista artist) {
        return this.rep.save(artist);
    }
    
}
