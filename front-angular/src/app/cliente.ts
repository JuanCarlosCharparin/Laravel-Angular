export class Cliente {
    id: number;
    nombres: string;
    apellidos: string;
    empresa: string;
    mail: string;
    telefono: string;

    constructor(id: number, nombres: string, apellidos: string, empresa: string, mail: string, telefono: string) {
        this.id = id;
        this.nombres = nombres;
        this.apellidos = apellidos;
        this.empresa = empresa;
        this.mail = mail;
        this.telefono = telefono;
    }
}
