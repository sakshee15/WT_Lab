package com.vit.results.controller;

import com.vit.results.model.StudentResult;
import com.vit.results.service.StudentResultService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/results")
@CrossOrigin(origins = "http://localhost:3000")
public class StudentResultController {
    @Autowired
    private StudentResultService service;

    @PostMapping("/add")
    public StudentResult addResult(@RequestBody StudentResult result) {
        return service.saveResult(result);
    }

    @GetMapping("/get/{prnNo}")
    public List<StudentResult> getResults(@PathVariable String prnNo) {
        return service.getResultsByPrnNo(prnNo);
    }
}
