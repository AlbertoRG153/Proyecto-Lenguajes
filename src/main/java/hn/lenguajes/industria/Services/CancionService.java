/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package hn.lenguajes.industria.Services;

import hn.lenguajes.industria.Entity.Cancion;
import java.util.List;

/**
 *
 * @author Iker
 */
public interface CancionService{
    List<Cancion> getSong();
    
    Cancion saveSong(Cancion song);
    
    Cancion assignArtistToSong(int art, int son);
    
    Cancion assignGenderToSong(int gen, int son);
    
    void deleteSong(int cod);
    
    Cancion findSong(int cod);
}
