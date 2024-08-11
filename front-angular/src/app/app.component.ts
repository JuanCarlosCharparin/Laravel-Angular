import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Cliente } from './cliente';
import { RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms'; // Importa FormsModule aquí

@Component({
  selector: 'app-root',
  standalone: true,
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  imports: [RouterOutlet, CommonModule, FormsModule] // Importa RouterOutlet si usas enrutamiento
})
export class AppComponent implements OnInit {
  clientes: Cliente[] = [];

  nuevoCliente: Cliente = {id:2, nombres: '', apellidos: '' , empresa: '', mail: '', telefono: ''}

  clienteAEditar: Cliente | null = null; 
  constructor(private http: HttpClient) {}

  //Metodo para traer todos los clientes
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

  //Metodo para agregar clientes
  agregarCliente() {
    this.http.post<Cliente>('http://localhost:8000/api/clientes', this.nuevoCliente).subscribe({
      next: (data) => {
        console.log('Cliente agregado', data);
        this.clientes.push(data);
        this.nuevoCliente = {id:2, nombres: '', apellidos: '' , empresa: '', mail: '', telefono: ''}; // Limpia el formulario
      },
      error: (err) => {
        console.error('Error adding cliente', err);
      }
    });
  }

  //Metodo para editar clientes
  editarCliente(cliente: Cliente) {
    this.clienteAEditar = { ...cliente }; // Clona el cliente para editar
  }

  actualizarCliente() {
    if (this.clienteAEditar) {
      this.http.put<Cliente>(`http://localhost:8000/api/clientes/${this.clienteAEditar.id}`, this.clienteAEditar).subscribe({
        next: (data) => {
          console.log('Cliente actualizado', data);
          // Actualiza el cliente en la lista local
          this.clientes = this.clientes.map(c => c.id === data.id ? data : c);
          this.clienteAEditar = null; // Resetea el cliente en edición
        },
        error: (err) => {
          console.error('Error updating cliente', err);
        }
      });
    }
  }

  eliminarCliente(cliente: Cliente) {
    if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
      this.http.delete(`http://localhost:8000/api/clientes/${cliente.id}`).subscribe({
        next: () => {
          console.log('Cliente eliminado');
          // Filtra el cliente eliminado de la lista
          this.clientes = this.clientes.filter(c => c.id !== cliente.id);
        },
        error: (err) => {
          console.error('Error deleting cliente', err);
        }
      });
    }
  }
}
