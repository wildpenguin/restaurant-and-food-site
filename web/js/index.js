/**
* Javascript and React JS entry file.
* Author: wildpenguin@gmail.com
*/

function findCustomizable()
{
	var elements = document.getElementsByClassName('customizable');

	return elements;
}

class CreateCustomizable extends React.Component {
	constructor(props) {
		super(props);

		this.state = {showEditButton: false, elementValue: 'hahahabuahaha'};
		this.activateTextEditing = this.activateTextEditing.bind(this);
		this.disableTextEditing = this.disableTextEditing.bind(this);
		this.saveNewText = this.saveNewText.bind(this);
	}
	activateTextEditing() {
		this.setState({showEditButton: true});
	}

	disableTextEditing() {
		this.setState({showEditButton: false});
	}

	saveNewText() {
		this.disableTextEditing();
		console.log('text saved');
	}

	render() {
		if (this.state.showEditButton) {
			return (
				<span>
					<input type='text' defaultValue={this.state.elementValue} />
					<i className="fa fa-floppy-o" aria-hidden="true" onClick={this.saveNewText}></i>
					<i className="fa fa-times-circle" aria-hidden="true" onClick={this.disableTextEditing}></i>
				</span>
			);
		} else {
			return (
				<span> {this.state.elementValue} 
					<i className="fa fa-pencil-square" aria-hidden="true" onClick={this.activateTextEditing}></i>
				</span>
			);
		}

	}
}

function fillWithDataAndAttachEditable(element) {
	ReactDOM.render(
		<CreateCustomizable/>,
		element
	);
}


var elements = findCustomizable();
for (var i=0; i < elements.length; i++) {
	fillWithDataAndAttachEditable(elements[i]);
}

