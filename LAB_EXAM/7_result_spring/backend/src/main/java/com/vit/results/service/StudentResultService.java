package com.vit.results.service;

import com.vit.results.model.StudentResult;
import com.vit.results.repository.StudentResultRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import java.util.List;

@Service
public class StudentResultService {
    @Autowired
    private StudentResultRepository repository;

    public StudentResult saveResult(StudentResult result) {
        return repository.save(result);
    }

    public List<StudentResult> getResultsByPrnNo(String prnNo) {
        return repository.findByPrnNo(prnNo);
    }
}
