import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule }  from '@angular/router';
import { HttpModule }	 from '@angular/http';
import { AppComponent }  from './components/app.component';
import { PostsComponent } from './components/posts.component';
import { PostComponent } from './components/post.component';

@NgModule({
    imports:      [ 
	BrowserModule ,
	HttpModule,
	RouterModule.forRoot([
	    {
	      path: 'posts',
		component: PostsComponent
	    },
	    {
	      path: 'posts/:id',
	      component: PostComponent
	    },
	])
    ],
    declarations: [ 
	AppComponent,
	PostsComponent,
	PostComponent
    ],
    bootstrap:    [ AppComponent ]
})
export class AppModule { }
