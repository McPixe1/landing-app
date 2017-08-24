// Importar el núcleo de Angular
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Page } from '../model/page';
import { PageService } from '../services/page.service';
import { ThemeService } from '../services/theme.service';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';
import { Location } from '@angular/common';

// Decorador component, indicamos en que etiqueta se va a cargar la 

@Component({
  selector: 'new-page',
  templateUrl: '../view/newpage.html',
  providers: [PageService, ThemeService]
})

// Clase del componente donde irán los datos y funcionalidades
export class NewPageComponent implements OnInit {

  public titulo: string = "Crear una nueva página";
  public page;
  public errorMessage;
  public status;
  public themes;
  constructor(
    private pageService: PageService,
    private themeService: ThemeService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.page = new Page(null, null, null);

    this.getAllThemes();
  }

  onSubmit(newPageForm) {

    this.pageService.create(this.page).subscribe(
      response => {
        this.status = response.status;
        if (this.status != "success") {
          this.status = "error";
        } else {
          this.page = response.data;
          console.log(this.page);
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


  getAllThemes() {
    this.route.params.subscribe(params => {
      this.themeService.getThemes().subscribe(
        response => {
          this.themes = response.data;
        }
      );
    });
  }

}
