/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Entity;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonManagedReference;
import jakarta.persistence.*;
import java.io.Serializable;
import java.sql.Date;
import java.time.Year;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;
import lombok.*;

/**
 *
 * @author Iker
 */
@Entity
@Table(name="artista")
@NoArgsConstructor
@AllArgsConstructor
@Data
public class Artista implements Serializable{
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    @Column(name="codigo_artista")
    private int codigo;
    
    @Column(name="nombre")
    private String nombre;
    
    @Column(name="apellido")
    private String apellido;
    
    @Column(name="anio_debut")
    private Year anio_debut;
    
    @JsonIgnore
    @OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.MERGE)
    @JoinColumn(name = "productora")
    private Productora productora;
    
    @JsonIgnore
    @ManyToMany(mappedBy = "artistas",fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private List<Cancion> canciones;
}
