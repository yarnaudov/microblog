import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

@Injectable()
export class PostService {
    
    private url = 'http://localhost:8000/api/posts'; // move this to config file
    
    constructor(private http: Http) { }
  
    getPosts(): Observable<Object[]> {
	return this.http.get(this.url).map(res => res.json());
    }
    
    getPost(id:any): Observable<Object> {
	return this.http.get(this.url + '/' + id).map(res => res.json());
    }
    
}