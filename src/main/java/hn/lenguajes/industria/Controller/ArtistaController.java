/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Controller;

import hn.lenguajes.industria.Entity.Artista;
import hn.lenguajes.industria.Services.IMPL.ArtistaServicesIMPL;
import hn.lenguajes.industria.Services.IMPL.ProductoraServicesIMPL;
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
@RequestMapping("/artist")
public class ArtistaController {
    @Autowired
    private ArtistaServicesIMPL impl;
     
    @GetMapping("/listar")
    public ResponseEntity<?> list(){
        List<Artista> listaArt=this.impl.getArt();
        return ResponseEntity.ok(listaArt);
    }
    
    @PostMapping("/create")
    public ResponseEntity<?> create(@RequestBody Artista art){
        Artista createdProd=this.impl.saveArt(art);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdProd);
    }
    
    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> delete(@PathVariable int id){
        this.impl.deleteArt(id);
        return ResponseEntity.ok().build();
    }
    
    @GetMapping("/find/{id}")
    public ResponseEntity<?> find(@PathVariable int id){
        return ResponseEntity.ok(this.impl.findArt(id));
    }
    
    @PutMapping("/{art}/producer/{prod}")
    public ResponseEntity<?> assignProducertoArtist(@PathVariable int art, @PathVariable int prod){
        return ResponseEntity.ok(this.impl.assignProducertoArtist(art, prod));
    }
    
    @PutMapping("/edit")
    public ResponseEntity<?> edit(@RequestBody Artista art){
        Artista editProd=this.impl.editArt(art);
        return ResponseEntity.status(HttpStatus.CREATED).body(editProd);
    }
}
