/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package hn.lenguajes.industria.Services;

import hn.lenguajes.industria.Entity.Genero;
import java.util.List;

/**
 *
 * @author Iker
 */
public interface GeneroService {
    List<Genero> getGend();
    
    Genero saveGend(Genero gender);
    
    void deleteGend(int cod);
    
    Genero findGend(int cod);
}
