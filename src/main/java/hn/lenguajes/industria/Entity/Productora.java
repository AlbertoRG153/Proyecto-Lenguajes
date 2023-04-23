/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Entity;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonManagedReference;
import jakarta.persistence.*;
import java.io.Serializable;
import java.sql.Date;
import java.time.Year;
import lombok.*;

/**
 *
 * @author Iker
 */
@Entity
@Data
@Table(name="productora")
@NoArgsConstructor
@AllArgsConstructor
public class Productora implements Serializable{
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    @Column(name="codigo_productora")
    private int codigo_productora;
    
    @Column(name="nombre")
    private String nombre;
    
    @Column(name="anio_inicio")
    private Year anio_inicio;
    
    @Column(name="pais_origen")
    private String pais_origen;
    
    @OneToOne(mappedBy = "productora", fetch = FetchType.LAZY, cascade = CascadeType.MERGE )
    private Artista artist;
}
