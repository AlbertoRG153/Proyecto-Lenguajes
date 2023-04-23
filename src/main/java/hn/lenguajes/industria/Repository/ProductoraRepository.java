/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package hn.lenguajes.industria.Repository;

import hn.lenguajes.industria.Entity.Artista;
import hn.lenguajes.industria.Entity.Productora;
import java.io.Serializable;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

/**
 *
 * @author Iker
 */
@Repository
public interface ProductoraRepository extends JpaRepository<Productora, Serializable> {
}
