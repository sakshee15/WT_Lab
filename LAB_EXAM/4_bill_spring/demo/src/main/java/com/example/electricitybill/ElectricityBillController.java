package com.example.electricitybill;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class ElectricityBillController {

    @GetMapping("/calculate")
    public double calculateBill(@RequestParam double units) {
        System.out.println(units);
        double bill = 0; // Example rate per unit
        if (units <= 50) {
            bill = units * 3.50;
            System.out.print(bill);
        } else if (units <= 150) {
            bill = 50 * 3.50 + (units - 50) * 4.00;
            System.out.print(bill);
        } else if (units <= 250) {
            bill = 50 * 3.50 + 100 * 4.00 + (units - 150) * 5.20;
            System.out.print(bill);
        } else {
            bill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + (units - 250) * 6.5;
            System.out.print(bill);
        }

        return bill;
    }
}
