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
import java.sql.Time;
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
@Table(name="cancion")
@NoArgsConstructor
@AllArgsConstructor
public class Cancion {
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    @Column(name="codigo_cancion")
    private int codigo;
    
    @Column(name="titulo")
    private String titulo;
    
    @Column(name="album")
    private String album;
    
    @Column(name="duracion")
    private Time duracion;
    
    @ManyToMany(fetch = FetchType.LAZY, cascade = CascadeType.MERGE)
    @JoinTable(name="artista_cancion",
               joinColumns = @JoinColumn(name="cancion"),
               inverseJoinColumns = @JoinColumn(name="artista"))
    private List<Artista> artistas;
    
    @ManyToMany(fetch = FetchType.LAZY, cascade = CascadeType.MERGE)
    @JoinTable(name="genero_cancion",
               joinColumns = @JoinColumn(name="cancion"),
               inverseJoinColumns = @JoinColumn(name="genero"))
    private List<Genero> generos;
}
