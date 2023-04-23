/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package hn.lenguajes.industria.Services;

import hn.lenguajes.industria.Entity.Artista;
import java.util.List;

/**
 *
 * @author Iker
 */
public interface ArtistaService {
    List<Artista> getArt();
    
    Artista saveArt(Artista artist);
    
    void deleteArt(int cod);
    
    Artista findArt(int cod);
    
    Artista assignProducertoArtist(int art, int prod);
}
