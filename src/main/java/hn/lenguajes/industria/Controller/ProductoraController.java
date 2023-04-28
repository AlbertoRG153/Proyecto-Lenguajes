/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package hn.lenguajes.industria.Controller;

import hn.lenguajes.industria.Entity.Productora;
import hn.lenguajes.industria.Services.IMPL.ProductoraServicesIMPL;
import java.util.List;
import org.springframework.beans.factory.annotation.*;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

/**
 *
 * @author Iker
 */
@RestController
@RequestMapping("/producer")
public class ProductoraController {

    @Autowired
    private ProductoraServicesIMPL pimpl;

    @GetMapping("/listar")
    public ResponseEntity<?> list() {
        List<Productora> listaProd = this.pimpl.getProd();
        return ResponseEntity.ok(listaProd);
    }

    @PostMapping("/create")
    public ResponseEntity<?> create(@RequestBody Productora prod) {
        Productora createdProd = this.pimpl.saveProd(prod);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdProd);
    }

    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> delete(@PathVariable int id) {
        this.pimpl.deleteProd(id);
        return ResponseEntity.ok().build();
    }

    @GetMapping("/find/{id}")
    public ResponseEntity<?> find(@PathVariable int id) {
        return ResponseEntity.ok(this.pimpl.findProd(id));
    }

    @PutMapping("/edit")
    public ResponseEntity<?> edit(@RequestBody Productora prod) {
        Productora editProd = this.pimpl.editProd(prod);
        return ResponseEntity.status(HttpStatus.CREATED).body(editProd);
    }

}
