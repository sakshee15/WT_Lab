// UserRepository.java
package main.java.com.example.bookstore;

import com.example.bookstore.model.User;
import org.springframework.data.jpa.repository.JpaRepository;

public interface UserRepository extends JpaRepository<User, Long> {
}