import { bootstrapApplication } from '@angular/platform-browser';
import { AppComponent } from './app/app.component';
import { provideHttpClient } from '@angular/common/http';
import { provideRouter } from '@angular/router';
import { routes } from './app/app.routes'; // Asegúrate de que la ruta esté bien configurada

bootstrapApplication(AppComponent, {
  providers: [
    provideHttpClient(),  // Proporciona el HttpClient
    provideRouter(routes) // Configura las rutas
  ]
})
.catch(err => console.error(err));
