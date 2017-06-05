import { Injectable } from '@angular/core';

@Injectable()
export class Config {

    // TODO: load this from json file
    private data = {
	'api': 'http://localhost:8000/api'
    };
    
    get(key:any) {
	if (this.data[key]) {
	    return this.data[key];
	}
	return null;
    }
    
}