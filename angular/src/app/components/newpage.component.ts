// Importar el núcleo de Angular
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Page } from '../model/page';
import { PageService } from '../services/page.service';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';
import { Location } from '@angular/common';

// Decorador component, indicamos en que etiqueta se va a cargar la 

@Component({
  selector: 'new-page',
  templateUrl: '../view/newpage.html',
  providers: [PageService]
})

// Clase del componente donde irán los datos y funcionalidades
export class NewPageComponent implements OnInit {

  public titulo: string = "Crear una nueva página";
  public page;
  public errorMessage;
  public status;
  constructor(
    private pageService: PageService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.page = new Page(null, null, null);
  }

  onSubmit() {
    this.pageService.create(this.page).subscribe(
      response => {
        this.status = response.status;
        if (this.status != "success") {
          this.status = "error";
        } else {
          this.page = response.data;
          this.router.navigate(['/page', this.page.id]);
        }
      },
      error => {
        this.errorMessage = < any > error;
        if (this.errorMessage != null) {
          console.log(this.errorMessage);
          alert("Error en la petición");
        }
      }
    );
  }

}
