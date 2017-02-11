/**
* Javascript and React JS entry file.
* Author: wildpenguin@gmail.com
*/

function findCustomizable()
{
    var elements = document.getElementsByClassName('customizable');

    return elements;
}

class CustomizableComponent extends React.Component {
    constructor(props) {
        super(props);

        this.activateTextEditing = this.activateTextEditing.bind(this);
        this.disableTextEditing = this.disableTextEditing.bind(this);
        this.saveNewText = this.saveNewText.bind(this);
        this.handleTextChange = this.handleTextChange.bind(this);
    
        var elementValue = this.props.element.innerText || this.props.element.textContent;
        this.state ={showTextEditing: false, elementValue: elementValue};
    }

    activateTextEditing() {
        this.setState({showTextEditing: true});
    }

    disableTextEditing() {
        this.setState({showTextEditing: false});
    }

    handleTextChange(e) {
        this.setState({elementValue: e.target.value});
    }

    saveNewText() {
        $.ajax({
          method: 'POST',
          url: 'api/page',
          data: {id: this.props.element.id, value: this.state.elementValue}
        })
        .done(function(data) {
            console.log('chunk saved');
        });
        //disable edit box
        this.disableTextEditing();
    }

    render() {
        if (!this.state.showTextEditing) {
            return (
                <span>
                    <input type='text' value={this.state.elementValue} onChange={this.handleTextChange} />
                    <i className="fa fa-floppy-o" aria-hidden="true" onClick={this.saveNewText}></i>
                    <i className="fa fa-times-circle" aria-hidden="true" onClick={this.disableTextEditing}></i>
                </span>
            );
        } else {
            return (
              
                <span> {this.state.elementValue||"Null why"}  
                    <sup>
                        <i className="fa fa-pencil-square" aria-hidden="true" onClick={this.activateTextEditing}></i>
                    </sup>
                </span>
            );
            console.log(this.state.elementValue);
        }

    }
}

function attachEditable(element) {
    ReactDOM.render(
        <CustomizableComponent element={element}/>,
        element
    );
}


var elements = findCustomizable();
for (var i=0; i < elements.length; i++) {
    attachEditable(elements[i]);
}

