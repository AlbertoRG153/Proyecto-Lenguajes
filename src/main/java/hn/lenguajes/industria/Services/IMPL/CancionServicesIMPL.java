/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Services.IMPL;

import hn.lenguajes.industria.Entity.Artista;
import hn.lenguajes.industria.Entity.Cancion;
import hn.lenguajes.industria.Entity.Genero;
import hn.lenguajes.industria.Repository.ArtistaRepository;
import hn.lenguajes.industria.Repository.CancionRepository;
import hn.lenguajes.industria.Repository.GeneroRepository;
import hn.lenguajes.industria.Services.CancionService;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author Iker
 */
@Service
public class CancionServicesIMPL implements CancionService{
    
    @Autowired
    private CancionRepository rep;

    @Autowired
    private ArtistaRepository repA;

    @Autowired
    private GeneroRepository repG;
    
    @Override
    public List<Cancion> getSong() {
        return this.rep.findAll();
    }

    @Override
    public Cancion saveSong(Cancion song) {
        song.setTitulo(song.getTitulo());
        return this.rep.save(song);
    }

    @Override
    public void deleteSong(int cod) {
        this.rep.deleteById(cod);
    }

    @Override
    public Cancion findSong(int cod) {
        return this.rep.findById(cod).get();
    }

    @Override
    public Cancion assignArtistToSong(int art, int son) {
        List<Artista> artistsSet = null;
        Cancion song = this.rep.findById(son).get();
        Artista artist = this.repA.findById(art).get();
        artistsSet =  song.getArtistas();
        artistsSet.add(artist);
        song.setArtistas(artistsSet);
        return rep.save(song);
    }

    @Override
    public Cancion assignGenderToSong(int gen, int son) {
        List<Genero> gendersList = null;
        Cancion song = this.rep.findById(son).get();
        Genero gender = this.repG.findById(gen).get();
        gendersList =  song.getGeneros();
        gendersList.add(gender);
        song.setGeneros(gendersList);
        return rep.save(song);
    }

    @Override
    public Cancion editSong(Cancion song) {
        song.setTitulo(song.getTitulo());
        return this.rep.save(song);
    }
    
}
