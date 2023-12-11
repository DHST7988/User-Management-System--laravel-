import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import { Table, Button, Modal, ModalHeader, ModalBody, ModalFooter, Input, FormGroup, Label } from 'reactstrap'; 
import axios from 'axios';
export default class Example extends Component{
    constructor(){
        super()
        this.state = {
        posts: [], //response of API into post state
        newPostModal: false, 
        newPostData: { title: "", content: "", user_id: "" }, 
        updatePostModal: false, 
        updatePostData: { id: "", title: "", content: "", user_id: "" } 
        }
    }
    loadPost(){
        axios.get('http://127.0.0.1:8000/api/posts').then((response) => {
        this.setState({
        posts:response.data
        })
        })
    }

    addPost() {
        
                axios.post('http://127.0.0.1:8000/api/post', this.state.newPostData).then((response) => { 
                    let { posts } = this.state 
                    this.loadPost()       
                     this.setState({ 
                        posts, 
                        newPostModal: false, 
                        newPostData: { title:"", content:"", user_id:"" }  
                    })  
                }) 
            }
    
        callUpdatePost(id, title, content, user_id)
        {
        this.setState({
            updatePostData:{id, title, content, user_id},
            updatePostModal: !this.state.updatePostModal
            })
        }

        updatePost(){
        let {id, title, content, user_id } = this.state.updatePostData
        axios.put('http://127.0.0.1:8000/api/post/'+id,{
        title, content, user_id
        }).then((response) =>{
        this.loadPost()
        this.setState({ //after execution, set all states to false
        updatePostModal: false,
        updatePostData: {id:"", title:"", content:"", user_id:"" }
       })

    })
    }
        toggleUpdatePostModal(){
            this.setState({
            updatePostModal:!this.state.updatePostModal
            })
        }

    toggleNewPostModal(){
        this.setState({
                newPostModal: !this.state.newPostModal 
            })
    }

    deletePost(id)
    {
        if (confirm("Do you want delete post id: "+id)==true)
        {
            axios.delete('http://127.0.0.1:8000/api/post/'+id).then ((response)=>{
            this.loadPost()
            alert("The post is deleted successfuly!")           
            })
        }
        else
        {
            this.loadPost()    
        }
    }
    componentWillMount(){
        this.loadPost();
    }

    render() {
        let posts = this.state.posts.map((post) => {
            return(
                <tr key={post.id}>
                    <td>{post.id}</td>
                    <td>{post.title}</td>
                    <td>{post.content}</td>
                    <td>
                        <Button color="success" size="sm" outline onClick={this.callUpdatePost.bind(this, post.id, post.title, post.content, post.user_id)}>Edit </Button>
                        <Button color="danger" size="sm" outline onClick={this.deletePost.bind(this,post.id)}>Delete </Button>
                    </td>
                </tr>
            )
        })
        return (
<div className="container">
<Button color="primary" onClick={this.toggleNewPostModal.bind(this)}>Add Post</Button> 
<Modal isOpen={this.state.newPostModal} toggle={this.toggleNewPostModal.bind(this)}> 
    <ModalHeader toggle={this.toggleNewPostModal.bind(this)}> Add New Post 
    </ModalHeader>

    <ModalBody>
        <FormGroup>
            <Label for = "title">Title</Label>
            <Input id = "title" value={this.state.newPostData.title} 
            onChange={(e) => { 
            let { newPostData } = this.state 
            newPostData.title = e.target.value 
            this.setState({ newPostData }) 
            }}></Input>
        </FormGroup>
        <FormGroup>
            <Label for = "content">Content</Label>
            <Input id = "content"
            value={this.state.newPostData.content} 
            onChange={(e) => { 
            let { newPostData } = this.state 
            newPostData.content = e.target.value 
            this.setState({ newPostData }) 
            }}></Input>
        </FormGroup>
        <FormGroup>
            <Label for = "user_id">User ID</Label>
            <Input id = "user_id"
            value={this.state.newPostData.user_id} 
            onChange={(e) => { 
            let { newPostData } = this.state 
            newPostData.user_id = e.target.value 
            this.setState({ newPostData }) 
            }}></Input>
        </FormGroup>
</ModalBody>
    <ModalFooter>
    <Button color="primary" onClick={this.addPost.bind(this)}>
        Add New Post</Button>{' '}
        <Button color="secondary" onClick={this.toggleNewPostModal.bind(this )}> Cancel </Button>
    </ModalFooter>
</Modal>


<Modal isOpen={this.state.updatePostModal} toggle={this.toggleUpdatePostModal.bind(this)}> 
    <ModalHeader toggle={this.toggleUpdatePostModal.bind(this)}> Update Post Modal
    </ModalHeader>

    <ModalBody>
        <FormGroup>
            <Label for = "title">Title</Label>
            <Input id = "title" value={this.state.updatePostData.title} 
            onChange={(e) => { 
            let { updatePostData } = this.state 
            updatePostData.title = e.target.value 
            this.setState({ updatePostData }) 
            }}></Input>
        </FormGroup>

        <FormGroup>
            <Label for = "content">Content</Label>
            <Input id = "content"
            value={this.state.updatePostData.content} 
            onChange={(e) => { 
            let { updatePostData } = this.state 
            updatePostData.content = e.target.value 
            this.setState({ updatePostData }) 
            }}></Input>
        </FormGroup>

        <FormGroup>
            <Label for = "user_id">User ID</Label>
            <Input id = "user_id"
            value={this.state.updatePostData.user_id} 
            onChange={(e) => { 
            let { updatePostData } = this.state 
            updatePostData.user_id = e.target.value 
            this.setState({ updatePostData }) 
            }}></Input>
        </FormGroup>
    </ModalBody>

    <ModalFooter>
        <Button color="primary" onClick={this.updatePost.bind(this)}>
        Update Post </Button>{' '}
        <Button color="secondary" onClick={this.toggleUpdatePostModal.bind(this )}> Cancel </Button>
    </ModalFooter>
</Modal>

                <Table>
                    <thead>
                        <tr>
                            <th>id </th>
                            <th>title </th>
                            <th>content </th>
                            <th>action </th>
                        </tr>
                    </thead>
                    <tbody>
                        {posts}
                    </tbody>
                    </Table>
        </div>
    );
}


}
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}