import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { DefaultComponent } from './components/default.component';
import { NewPageComponent } from './components/newpage.component';
import { PageComponent } from './components/page.component';
import { BlockComponent } from './components/block.component';
const routes: Routes = [
  { path: '', redirectTo: '/index', pathMatch: 'full' },
  { path: 'index', component: DefaultComponent },
  { path: 'newpage', component: NewPageComponent },
  { path: 'page/:id', component: PageComponent },
  { path: 'block', component: BlockComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
