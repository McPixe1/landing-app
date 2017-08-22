// Importar el núcleo de Angular
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Page } from '../model/page';
import { PageService } from '../services/page.service';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';
import { Location } from '@angular/common';

// Decorador component, indicamos en que etiqueta se va a cargar la 

@Component({
  selector: 'page',
  templateUrl: '../view/page.html',
  providers: [PageService]
})

// Clase del componente donde irán los datos y funcionalidades
export class PageComponent implements OnInit {

  public errorMessage;
  public page;
  public status;

  constructor(
    private pageService: PageService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.route.params.subscribe(params => {
      let id = +params["id"];

      this.pageService.getPage(id).subscribe(
        response => {
          this.page = response.data;
          this.status = response.status;
          if (this.status != "success") {
            this.router.navigate(["/index"]);
            
          }
        },
        error => {
          this.errorMessage = < any > error;
          if (this.errorMessage != null) {
            alert("Error en la petición");
          }
        }
      );

    });
  }



}
