/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package hn.lenguajes.industria.Services;

import hn.lenguajes.industria.Entity.Productora;
import java.util.List;

/**
 *
 * @author Iker
 */
public interface productoraService {
    List<Productora> getProd();
    
    Productora saveProd(Productora productora);
    
    void deleteProd(int cod);
    
    Productora findProd(int cod);
}
