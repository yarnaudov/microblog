import { Component } from '@angular/core';
import { OnInit } from '@angular/core';
import { PostService } from '../services/post.service';

@Component({
    providers: [PostService],
    template: `
	<div class="blog-post" *ngFor="let post of posts" >
	    <h2 class="blog-post-title">
		<a routerLink="{{ post.id }}" >{{post.title}}</a>
	    </h2>
	    <p class="blog-post-meta">
		{{ post.created_at*1000 | date:"dd MMMM yyyy" }}, by {{ post.user }}
	    </p>
	    <p>{{post.text}}</p>\n\
	    <hr>
	</div>
    `
})
export class PostsComponent implements OnInit {

    posts: Object[] = [];

    constructor(private postService: PostService) { }

    getPosts(): void {
	this.postService.getPosts().subscribe(posts => this.posts = posts);
    }
    
    ngOnInit(): void {
	this.getPosts();
    }

}
