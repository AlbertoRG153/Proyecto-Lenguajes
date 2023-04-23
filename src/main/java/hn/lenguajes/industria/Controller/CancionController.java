/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Controller;

import hn.lenguajes.industria.Entity.Cancion;
import hn.lenguajes.industria.Services.IMPL.ArtistaServicesIMPL;
import hn.lenguajes.industria.Services.IMPL.CancionServicesIMPL;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

/**
 *
 * @author Iker
 */
@RestController
@RequestMapping("/song")
public class CancionController {
    @Autowired
    private CancionServicesIMPL impl;
     
    @GetMapping("/listar")
    public ResponseEntity<?> list(){
        List<Cancion> listaSongs=this.impl.getSong();
        return ResponseEntity.ok(listaSongs);
    }
    
    @PostMapping("/create")
    public ResponseEntity<?> create(@RequestBody Cancion art){
        Cancion createdProd=this.impl.saveSong(art);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdProd);
    }
    
    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> delete(@PathVariable int id){
        this.impl.deleteSong(id);
        return ResponseEntity.ok().build();
    }
    
    @GetMapping("/find/{id}")
    public ResponseEntity<?> find(@PathVariable int id){
        return ResponseEntity.ok(this.impl.findSong(id));
    }
    
    @PutMapping("/{song}/assign/{artist}")
    public ResponseEntity<?> assignArtistToSong(@PathVariable int artist, @PathVariable int song){
        return ResponseEntity.ok(this.impl.assignArtistToSong(artist, song));
    }
    
    @PutMapping("/{song}/addGender/{gen}")
    public ResponseEntity<?> assignGenderToSong(@PathVariable int gen, @PathVariable int song){
        return ResponseEntity.ok(this.impl.assignGenderToSong(gen, song));
    }
}
