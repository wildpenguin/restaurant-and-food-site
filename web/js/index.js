/**
* Javascript and React JS entry file.
* Author: wildpenguin@gmail.com
*/

import React from 'react';
import ReactDOM from 'react-dom';
import Modal from 'react-modal';

const customStyles = {
  content : {
    top                   : '50%',
    left                  : '50%',
    right                 : 'auto',
    bottom                : 'auto',
    marginRight           : '-50%',
    transform             : 'translate(-50%, -50%)'
  }
};

class DialogForm extends React.Component {
    constructor(props) {
        super(props);
        this.onTextChange = this.onTextChange.bind(this);
        this.onTextSave = this.onTextSave.bind(this);
    }
    
    onTextChange(e) {
        this.props.handleTextChange(e.target.value);
    }

    onTextSave() {
        this.props.handleTextSave();
    }


    render() {
        return (
            <form>
                <textarea onChange={this.onTextChange} defaultValue={this.props.value}>
                </textarea>
                <button className="btn btn-primary" onClick={this.onTextSave}>Save</button>
            </form>
        );
    }
}

class DialogMessage extends React.Component {
    render() {
        return (
            <p>{this.props.message} </p>
        );
    }
}

class CustomizableComponent extends React.Component {
    constructor(props) {
        super(props);

        this.handleTextSave = this.handleTextSave.bind(this);
        this.handleTextChange = this.handleTextChange.bind(this);
        this.openModal = this.openModal.bind(this);
        this.afterOpenModal = this.afterOpenModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
  
        this.state = {
            modalIsOpen: false,
            elementValue: this.props.element.textContent,
            displayForm: true,
        };
       
    }

    openModal() {
        this.setState({modalIsOpen: true});
    }

    afterOpenModal() {
        // references are now sync'd and can be accessed.
        this.refs.subtitle.style.color = '#f00';
    }

    closeModal() {
        this.setState({modalIsOpen: false});
    }
    
    handleTextChange(value) {
        this.setState({elementValue: value});
        console.log('new value' + e.target.value);
    }

    handleTextSave() {
        $.ajax({
          method: 'POST',
          url: 'api/content/'+this.props.element.id,
          data: {
            value: this.state.elementValue
          },
          dataType: 'json',
        })
        .done(function(data) {
            if ('success' == data.status) {
                this.setState({displayForm: false});
            }
        });
    }

    render() {

            return (
                <span> 
                    {this.state.elementValue}
                    <sup>
                        <i className="fa fa-pencil-square" aria-hidden="true" onClick={this.openModal}></i>
                    </sup>
               
                    <Modal
                        isOpen={this.state.modalIsOpen}
                        onAfterOpen={this.afterOpenModal}
                        onRequestClose={this.closeModal}
                        style={customStyles}
                        contentLabel="Example Modal"
                    >
                    <h2 ref="subtitle">Online Editor</h2>


                    <button className="btn" onClick={this.closeModal}>Close</button>
                    </Modal>
                </span>
            );
            
        }

    //}
}

function findCustomizable()
{
    var elements = document.getElementsByClassName('customizable');

    return elements;
}

function attachEditable(element) {

    ReactDOM.render(
        <CustomizableComponent element={element} />,
        element
    );
}

function init() {

    var elements = findCustomizable();

    for (var i=0; i < elements.length; i++) {
        attachEditable(elements[i]);
    }
}

/* main function */
init();

