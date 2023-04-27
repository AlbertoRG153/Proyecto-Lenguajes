/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Controller;

import hn.lenguajes.industria.Entity.Genero;
import hn.lenguajes.industria.Services.IMPL.GeneroServiceIMPL;
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
@RequestMapping("/gender")
public class GeneroController {
    @Autowired
    private GeneroServiceIMPL impl;
     
    @GetMapping("/listar")
    public ResponseEntity<?> list(){
        List<Genero> listaSongs=this.impl.getGend();
        return ResponseEntity.ok(listaSongs);
    }
    
    @PostMapping("/create")
    public ResponseEntity<?> create(@RequestBody Genero art){
        Genero createdProd=this.impl.saveGend(art);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdProd);
    }
    
    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> delete(@PathVariable int id){
        this.impl.deleteGend(id);
        return ResponseEntity.ok().build();
    }
    
    @GetMapping("/find/{id}")
    public ResponseEntity<?> find(@PathVariable int id){
        return ResponseEntity.ok(this.impl.findGend(id));
    }

    @PutMapping("/edit")
    public ResponseEntity<?> edit(@RequestBody Genero gend){
        Genero editGend=this.impl.editGend(gend);
        return ResponseEntity.status(HttpStatus.CREATED).body(editGend);
    }
}
