package com.vit.results.model;

import javax.persistence.*;

@Entity
@Table(name = "results")
public class StudentResult {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String prnNo;
    private String subject;
    private int mseMarks;
    private int eseMarks;
    private int maxMarksMse;
    private int maxMarksEse;

    // Getters and Setters
}
