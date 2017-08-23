import { Component } from '@angular/core';
import { ActivatedRoute, ParamMap, Router } from '@angular/router';
import { Input, Output} from '@angular/core';

// Decorador component, indicamos en que etiqueta se va a cargar la 

@Component({
  selector: 'block',
  templateUrl: '../view/blocks/block.html',
})

// Clase del componente donde irán los datos y funcionalidades
export class BlockComponent {
   @Input() block;
}
