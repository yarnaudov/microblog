import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import { Config } from '../config';

@Injectable()
export class PostService {
    
    private url:string;//'http://localhost:8000/api/posts'; // move this to config file
    
    constructor(private http: Http, private config: Config) {
	this.url = this.config.get('api') + '/posts';
    }
  
    getPosts(): Observable<Object[]> {
	return this.http.get(this.url).map(res => res.json());
    }
    
    getPost(id:any): Observable<Object> {
	return this.http.get(this.url + '/' + id).map(res => res.json());
    }
    
}