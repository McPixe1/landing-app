import {Injectable} from "@angular/core";
import {Http, Response, Headers} from "@angular/http";
import "rxjs/add/operator/map";
import { Observable } from "rxjs/Observable";

@Injectable()
export class PageService{

	public url = "http://localhost/landing-generator/symfony/web/app_dev.php";

	constructor(private _http: Http){}

	create(page){
		let json = JSON.stringify(page);
		let params = "json="+json;
		let headers = new Headers({'Content-Type':'application/x-www-form-urlencoded'});

		return this._http.post(this.url+"/page/new", params, {headers: headers})
			.map(res => res.json());
	}

	getPage(id){
		return this._http.get(this.url+"/page/"+id).map(res => res.json());
	}

	getPages(){
		return this._http.get(this.url+"/pages").map(res => res.json());
	}
}