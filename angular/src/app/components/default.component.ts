import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Page } from '../model/page';
import { PageService } from '../services/page.service';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';

// Decorador component, indicamos en que etiqueta se va a cargar la 

@Component({
  selector: 'default',
  templateUrl: '../view/default.html',
  providers: [PageService]
})

// Clase del componente donde irán los datos y funcionalidades
export class DefaultComponent implements OnInit {
  public title = "Listado de páginas";
  public pages;
  public errorMessage;
  public status;
  public loading = "show";

  constructor(
    private pageService: PageService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit() {
    this.getAllPages();
  }

  getAllPages() {
    this.route.params.subscribe(params => {
      this.pageService.getPages().subscribe(
        response => {
          this.status = response.status;
          if (this.status != "success") {
            this.status = "error";
          } else {
            this.pages = response.data;
            this.loading = "hide";
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
    });
  }

}
