import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Cliente } from './cliente';
import { RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common';
@Component({
  selector: 'app-root',
  standalone: true,
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  imports: [RouterOutlet, CommonModule] // Importa RouterOutlet si usas enrutamiento
})
export class AppComponent implements OnInit {
  clientes: Cliente[] = [];

  constructor(private http: HttpClient) {}

  ngOnInit() {
    this.http.get<Cliente[]>('http://localhost:8000/api/clientes').subscribe({
      next: (data) => {
        this.clientes = data;
      },
      error: (err) => {
        console.error('Error fetching clientes', err);
      }
    });
  }
}
