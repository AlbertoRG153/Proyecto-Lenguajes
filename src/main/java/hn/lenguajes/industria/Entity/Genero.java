/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Entity;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonManagedReference;
import jakarta.persistence.*;
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
@Data
@Table(name="genero")
@NoArgsConstructor
@AllArgsConstructor
public class Genero {
    @Id
    @Column(name="codigo_genero")
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    private int codigo;
    
    @Column(name="descripcion")
    private String descripcion;
    
    @JsonIgnore
    @ManyToMany(mappedBy = "generos",fetch = FetchType.LAZY, cascade = CascadeType.MERGE)
    private Set<Cancion> canciones = new HashSet<>();
    
    /*
    @OneToMany(fetch = FetchType.LAZY, cascade = CascadeType.ALL, mappedBy = "gender")
    @JsonManagedReference
    private Set<genero_cancion> canciones = new HashSet<>();
    */
}
