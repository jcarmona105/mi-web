import heapq

# Grafo como diccionario de adyacencia con pesos
grafo = {
    'O': {'A': 4, 'B': 6, 'C': 5},
    'A': {'B': 1, 'D': 7},
    'B': {'D': 5, 'C': 2, 'E': 4},
    'C': {'E': 5},
    'D': {'T': 6},
    'E': {'T': 6},
    'T': {}
}

def dijkstra(grafo, inicio, fin):
    distancias = {nodo: float('inf') for nodo in grafo}
    distancias[inicio] = 0
    anteriores = {nodo: None for nodo in grafo}
    cola_prioridad = [(0, inicio)]

    while cola_prioridad:
        distancia_actual, nodo_actual = heapq.heappop(cola_prioridad)

        if nodo_actual == fin:
            break

        for vecino, peso in grafo[nodo_actual].items():
            nueva_distancia = distancia_actual + peso
            if nueva_distancia < distancias[vecino]:
                distancias[vecino] = nueva_distancia
                anteriores[vecino] = nodo_actual
                heapq.heappush(cola_prioridad, (nueva_distancia, vecino))

    # Reconstrucción del camino
    camino = []
    nodo = fin
    while nodo:
        camino.insert(0, nodo)
        nodo = anteriores[nodo]

    return camino, distancias[fin]

# Ejecutar el algoritmo
camino_mas_corto, distancia_total = dijkstra(grafo, 'O', 'T')

# Mostrar resultados
print("Ruta más corta:", " → ".join(camino_mas_corto))
print("Distancia total:", distancia_total)
