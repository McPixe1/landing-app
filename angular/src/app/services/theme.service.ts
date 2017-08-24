import {Injectable} from "@angular/core";
import {Http, Response, Headers} from "@angular/http";
import "rxjs/add/operator/map";
import { Observable } from "rxjs/Observable";

@Injectable()
export class ThemeService{

	public url = "http://localhost/landing-generator/symfony/web/app_dev.php";

	constructor(private _http: Http){}

	getThemes(){
		return this._http.get(this.url+"/themes").map(res => res.json());
	}
}