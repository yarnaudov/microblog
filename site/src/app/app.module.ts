import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule }  from '@angular/router';
import { HttpModule }	 from '@angular/http';
import { AppComponent }  from './components/app.component';

@NgModule({
    imports:      [ 
	BrowserModule ,
	HttpModule,
	RouterModule.forRoot([
	    //{
	    //  path: 'posts',
	    //  component: PostsConponent
	    //}
	])
    ],
    declarations: [ 
	AppComponent
    ],
    bootstrap:    [ AppComponent ]
})
export class AppModule { }
