// CONSTANTS
export const ROW = 23;
export const COL = 45;

export const graphNode = document.getElementById("graph");
export const screenWidth = screen.width;

export const graph = new Object();
export const grid = [0, 0];
export const dfsGraph = new Object();
export const dfsGrid = [0, 0];

// VARIABLES
export let timeDFS = -100;
export let start = 0; // Initial position

// GENERATORS
function graphGen() {
	const nodeCount = grid[0] * grid[1];

	graph.length = 0;
	for (let nodeID = 0; nodeID < nodeCount; nodeID++) {
		const nodeObj = new Object();
		nodeObj.blocked = false;
		nodeObj.adjacents = getAdj(nodeID);
		graph[`${nodeID}`] = nodeObj;
	}
	graphGenDFS();
}
function graphGenDFS() {
	const nodeCount = dfsGrid[0] * dfsGrid[1];

	dfsGraph.length = 0;
	for (let nodeID = 0; nodeID < nodeCount; nodeID++) {
		const nodeObj = new Object();
		nodeObj.visited = false;
		nodeObj.previous = nodeID == 0 ? "-1" : null;
		nodeObj.complementary = getComplementary(nodeID);
		nodeObj.adjacents = getAdjDFS(nodeID);
		dfsGraph[`${nodeID}`] = nodeObj;
	}
}
function nodeToRow(node, dfs = false) {
	if (dfs) {
		return Math.floor(parseInt(node) / dfsGrid[1]);
	}
	return Math.floor(parseInt(node) / grid[1]);
}
function nodeToCol(node, dfs = false) {
	if (dfs) {
		return node - nodeToRow(node, true) * dfsGrid[1];
	}
	return node - nodeToRow(node) * grid[1];
}
function row_colToNode(row, col, dfs = false) {
	if (dfs) {
		return row * dfsGrid[1] + col;
	}
	return row * grid[1] + col;
}

// TOGGLES
function toggleBlockage(node) {
	graph[node].blocked = !graph[node].blocked;
	document.getElementById(`cell-${node}`).classList.toggle("blocked");
}

// get possible adjacent nodeID(s)
function getAdj(node) {
	const row = nodeToRow(node);
	const col = nodeToCol(node);
	let tempAdjPoints = [
		[row - 1, col],
		[row, col - 1],
		[row, col + 1],
		[row + 1, col],
	];
	return filterAdjs(tempAdjPoints);
}
function filterAdjs(adjsToFilter) {
	let tempFilteredAdjs = [];
	let filteredAdjs = [];
	adjsToFilter.forEach((adj) => {
		if (
			adj[0] >= 0 &&
			adj[0] <= grid[0] - 1 &&
			adj[1] >= 0 &&
			adj[1] <= grid[1] - 1
		) {
			tempFilteredAdjs.push(adj);
		}
	});
	tempFilteredAdjs.forEach((tempFilteredAdj) => {
		const adjVal = row_colToNode(tempFilteredAdj[0], tempFilteredAdj[1]);
		filteredAdjs.push(`${adjVal}`);
	});
	return filteredAdjs;
}

function getAdjDFS(node) {
	const row = nodeToRow(node, true);
	const col = nodeToCol(node, true);
	let tempAdjPoints = [
		[row - 1, col],
		[row, col - 1],
		[row, col + 1],
		[row + 1, col],
	];
	return filterAdjsDFS(tempAdjPoints);
}
function filterAdjsDFS(adjsToFilter) {
	let tempFilteredAdjs = [];
	let filteredAdjs = [];
	adjsToFilter.forEach((adj) => {
		if (
			adj[0] >= 0 &&
			adj[0] <= dfsGrid[0] - 1 &&
			adj[1] >= 0 &&
			adj[1] <= dfsGrid[1] - 1
		) {
			tempFilteredAdjs.push(adj);
		}
	});
	tempFilteredAdjs.forEach((tempFilteredAdj) => {
		const adjVal = row_colToNode(tempFilteredAdj[0], tempFilteredAdj[1], true);
		filteredAdjs.push(`${adjVal}`);
	});
	return shuffle(filteredAdjs);
}

function getComplementary(node) {
	// sourcery skip: dont-reassign-parameters
	node = parseInt(node);
	const row = nodeToRow(node, true) * 2;
	const col = nodeToCol(node, true) * 2;
	return `${row_colToNode(row, col)}`;
}
function getEdgeNode(nodeDFS, prevNodeDFS) {
	const node = dfsGraph[parseInt(nodeDFS)].complementary;
	const prevNode = dfsGraph[parseInt(prevNodeDFS)].complementary;
	const nodeArr = [nodeToRow(node), nodeToCol(node)];
	const prevNodeArr = [nodeToRow(prevNode), nodeToCol(prevNode)];
	const edgeRow = (nodeArr[0] + prevNodeArr[0]) / 2;
	const edgeCol = (nodeArr[1] + prevNodeArr[1]) / 2;
	return `${row_colToNode(edgeRow, edgeCol)}`;
}

// Route creation

// MAIN FUNCTIONS
export function DFS(node = "0", prevNode = "-1") {
	if (!dfsGraph[node].visited) {
		dfsGraph[node].previous = prevNode;
		dfsGraph[node].visited = true;
	}

	drawDFS(node, prevNode);

	// if (!checkAdjAvailableDFS(node)) return true;
	const adjNodes = shuffle(dfsGraph[node].adjacents);
	adjNodes.forEach((adjNode) => {
		if (adjNode != prevNode && !dfsGraph[adjNode].visited) {
			return DFS(adjNode, node);
		}
	});
	return;
}

// VISUALIZERS
function drawGraph() {
	while (graphNode.firstChild) {
		graphNode.removeChild(graphNode.lastChild);
	}
	for (let rowCount = 0; rowCount < grid[0]; rowCount++) {
		const rowElement = document.createElement("div");
		rowElement.className = "row";
		rowElement.id = `row-${rowCount}`;
		graphNode.appendChild(rowElement);
	}
	for (const node in graph) {
		if (Object.hasOwnProperty.call(graph, node)) {
			const nodeObj = graph[node];
			const rowId = `row-${nodeToRow(node)}`;
			if (node != "length") {
				const nodeElement = document.createElement("div");
				nodeElement.className = "cell ";
				if (nodeObj.blocked) {
					nodeElement.className += "blocked ";
				}
				nodeElement.id = `cell-${node}`;
				document.getElementById(rowId).appendChild(nodeElement);
			}
		}
	}
	if (screenWidth <= 500) {
		graphNode.style.width = `${screenWidth - 40}px`;
		graphNode.style.height = `${screenWidth - 40}px`;

		const cellSide = (screenWidth - 40) / grid[0];
		const cellWidth = (screenWidth - 40) / grid[1];
		const cellList = document.getElementsByClassName("cell");

		for (let cellCount = 0; cellCount < cellList.length; cellCount++) {
			const cellElement = cellList[cellCount];
			cellElement.style.height = `${cellSide}px`;
			cellElement.style.width = `${cellWidth}px`;
		}
	}
}

function drawDFS(node, prevNode) {
	var selector = "blocks";
	if (node != 0) {
		timeDFS += 50;
		const edgeNode = getEdgeNode(node, prevNode);
		setTimeout(() => {
			toggleBlockage(edgeNode);
		}, timeDFS);
	}
	timeDFS += 50;
	setTimeout(() => {
		toggleBlockage(dfsGraph[node].complementary);
	}, timeDFS);
}

// EXECUTORS
export function generate() {
	graphNode.style.pointerEvents = "all";

	// Resets
	grid[0] = 0;
	grid[1] = 0;
	dfsGrid[0] = 0;
	dfsGrid[1] = 0;
	var target = 0;
	var found = false;

	// Get values
	grid[0] = ROW;
	grid[1] = COL;
	dfsGrid[0] = Math.ceil(grid[0] / 2);
	dfsGrid[1] = Math.ceil(grid[1] / 2);

	target = grid[0] * grid[1] - 2 - grid[0];
	start = row_colToNode(1, 1);

	// Generate graph
	graphGen();
	drawGraph();

	// Set value of routes
	var routes = [[start]];
	return false;
}

function shuffle(array) {
	let currentIndex = array.length,
		randomIndex;

	while (currentIndex != 0) {
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex--;
		[array[currentIndex], array[randomIndex]] = [
			array[randomIndex],
			array[currentIndex],
		];
	}

	return array;
}
