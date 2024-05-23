package com.vit.results.repository;

import com.vit.results.model.StudentResult;
import org.springframework.data.jpa.repository.JpaRepository;
import java.util.List;

public interface StudentResultRepository extends JpaRepository<StudentResult, Long> {
    List<StudentResult> findByPrnNo(String prnNo);
}
